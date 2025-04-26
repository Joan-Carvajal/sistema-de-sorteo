<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExcelController extends Controller
{
    public function __invoke(): BinaryFileResponse
    {
        return Excel::download(new UserExport, 'usuarios.xlsx');
    }
}
