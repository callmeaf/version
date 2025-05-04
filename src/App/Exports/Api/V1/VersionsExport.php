<?php

namespace Callmeaf\Version\App\Exports\Api\V1;

use Callmeaf\Version\App\Models\Version;
use Callmeaf\Version\App\Repo\Contracts\VersionRepoInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class VersionsExport implements FromCollection,WithHeadings,Responsable,WithMapping,WithCustomChunkSize
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = '';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    private VersionRepoInterface $versionRepo;
    public function __construct()
    {
        $this->versionRepo = app(VersionRepoInterface::class);
        $this->fileName = $this->fileName ?: \Base::exportFileName(model: $this->versionRepo->getModel()::class,extension: $this->writerType);
    }

    public function collection()
    {
        if(\Base::getTrashedData()) {
            $this->versionRepo->trashed();
        }

        $this->versionRepo->latest()->search();

        if(\Base::getAllPagesData()) {
            return $this->versionRepo->lazy();
        }

        return $this->versionRepo->paginate();
    }

    public function headings(): array
    {
        return [
           // 'status',
        ];
    }

    /**
     * @param Version $row
     * @return array
     */
    public function map($row): array
    {
        return [
            // $row->status?->value,
        ];
    }

    public function chunkSize(): int
    {
        return \Base::config('export_chunk_size');
    }
}
