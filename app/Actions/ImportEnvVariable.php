<?php

namespace App\Actions;

use App\DTOs\Env;
use App\Models\Environment;
use App\Service\ParseEnvFile;
use Illuminate\Database\Eloquent\Model;

readonly class ImportEnvVariable
{
    public function __construct(
        private ParseEnvFile $parseEnvFile
    ) {
    }

    /**
     * @param string $data
     * @param Model $environment
     * @return void
     */
    public function import(string $data, Model $environment): void
    {
        $envs = $this->parseEnvFile->parse($data);
        /** @var <array<Env>> $envs */
        foreach ($envs as $env) {
            /** @var Environment $environment */
             $environment->environmentValues()->updateOrCreate(
                 [
                     'key' => $env->key,
                 ],
                 [
                     'value' => $env->value,
                     'gap_after' => $env->gapAfter,
                 ],
             );
        }
    }
}