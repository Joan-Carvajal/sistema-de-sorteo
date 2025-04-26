import { AppContent } from "@/components/app-content";
import SorteoForm from "./SorteoForm";
import RegistroForm from "./RegistroForm";
import ExportarExcel from "./ExportarExcel";
import { Head } from "@inertiajs/react";

interface LandingProps {
  departementos: any[];
  ciudades: any[];
  ganador: any;
}

function Landing({ departementos, ganador, ciudades, }: LandingProps) {
  return (
    <>
        <Head title="Landing"/>
      <AppContent >
        
        <header className="mt-10">
          <h1 className="text-4xl text-center font-bold">Promoción de Automóviles</h1>
          <p className="text-center font-semibold">Regístrate y participa por grandes premios</p>
        </header>

        <RegistroForm departementos={departementos} ciudades={ciudades} />
        <ExportarExcel />
        <SorteoForm ganador={ganador} />
      </AppContent>
    </>
  )
}

export default Landing