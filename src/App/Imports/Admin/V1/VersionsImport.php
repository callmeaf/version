<?php

namespace Callmeaf\Version\App\Imports\Admin\V1;

use Callmeaf\Base\App\Services\Importer;
use Callmeaf\Version\App\Enums\VersionStatus;
use Callmeaf\Version\App\Repo\Contracts\VersionRepoInterface;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class VersionsImport extends Importer implements ToCollection,WithChunkReading,WithStartRow,SkipsEmptyRows,WithValidation,WithHeadingRow
{
    private VersionRepoInterface $versionRepo;

    public function __construct()
    {
        $this->versionRepo = app(VersionRepoInterface::class);
    }

    public function collection(Collection $collection)
    {
        $this->total = $collection->count();

        foreach ($collection as $row) {
            $this->versionRepo->freshQuery()->create([
                // 'status' => $row['status'],
            ]);
            ++$this->success;
        }
    }

    public function chunkSize(): int
    {
        return \Base::config('import_chunk_size');
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        $table = $this->versionRepo->getTable();
        return [
            // 'status' => ['required',Rule::enum(VersionStatus::class)],
        ];
    }

}
