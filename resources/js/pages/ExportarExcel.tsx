import { Label } from "@/components/ui/label"


function ExportarExcel() {
  return (
    <>
        <section >
            <Label className="block mb-4">Exportar Usuarios a Excel</Label>
            <a href={route('exportar.excel')} className="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Descargar Excel
            </a>
        </section>
    </>
  )
}

export default ExportarExcel