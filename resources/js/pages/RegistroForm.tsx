import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";

import { useForm } from "@inertiajs/react";
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogDescription
} from '@/components/ui/dialog';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { useMemo, useState } from "react";
import { Checkbox } from "@/components/ui/checkbox";
import InputError from "@/components/input-error";


interface RegistroProps {
  departementos: any[];
  ciudades: any[];

}
function RegistroForm({ departementos, ciudades }: RegistroProps) {
  const [showDialog, setShowDialog] = useState(false);
  const {
    data,
    setData,
    post,
    processing,
    errors,
    reset,
  } = useForm({
    nombre: '',
    apellido: '',
    cedula: '',
    departamento_id: '',
    ciudad_id: '',
    celular: '',
    email: '',
    habeas: false as boolean,
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setData(name, value);
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    post(route('register.store'), {
      preserveScroll: true,
      onSuccess: () => {
        setShowDialog(true);
        reset('nombre', 'apellido', 'cedula', 'departamento_id', 'ciudad_id', 'celular', 'email', 'habeas');
      },
    });
  };

  const ciudadesFiltradas = useMemo(() => {
    if (!data.departamento_id) return [];
    return ciudades.filter(c => c.departamento_id === parseInt(data.departamento_id));
  }, [data.departamento_id, ciudades]);
  return (
    <>
      <section className="mt-10">
        <h2 className="text-center font-semibold text-2xl mb-5">Registro de Participantes</h2>
        <form onSubmit={handleSubmit}>
          <div className="md:flex gap-x-4">
            <div className="mb-3 md:w-[50%]">
              <Label htmlFor="nombre" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</Label>
              <Input
                type="text"
                id="nombre"
                name="nombre"
                value={data.nombre}
                onChange={handleChange}
                placeholder="Ingresa tu nombre"
                className="mb-4" />
              <InputError message={errors.nombre} />
            </div>
            <div className="mb-3 md:w-[50%]">
              <Label htmlFor="apellido" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apellido</Label>
              <Input
                type="text"
                id="apellido"
                name="apellido"
                value={data.apellido}
                onChange={handleChange}
                placeholder="Ingresa tu apellido"
                className="mb-4" />
              <InputError message={errors.apellido} />

            </div>
          </div>
          <div className="mb-3 md:w-[90%]">
            <Label htmlFor="cedula" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cedula</Label>
            <Input
              type="text"
              id="cedula"
              name="cedula"
              value={data.cedula}
              onChange={handleChange}
              placeholder="Ingresa tu cedula"
              className="mb-4" />
            <InputError message={errors.cedula} />

          </div>
          <div className="md:flex gap-x-4">
            <div className="mb-3 md:w-[50%]">
              <Label htmlFor="departamento" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Departamento</Label>
              <Select
                value={data.departamento_id ? data.departamento_id.toString() : ''}
                onValueChange={(value) => setData('departamento_id', value)}
              >
                <SelectTrigger id="departamento">
                  <SelectValue placeholder="Selecciona un departamento" />
                </SelectTrigger>
                <SelectContent>
                  {departementos.map((departamento) => (
                    <SelectItem key={departamento.id} value={departamento.id.toString()}>
                      {departamento.nombre}
                    </SelectItem>
                  ))}
                </SelectContent>
              </Select>
              <InputError message={errors.departamento_id} />

            </div>

            <div className="mb-3 md:w-[50%]">
              <Label htmlFor="ciudad" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ciudad</Label>
              <Select
                value={data.ciudad_id ? data.ciudad_id.toString() : ''}
                onValueChange={(value) => setData('ciudad_id', value)}
                disabled={!ciudadesFiltradas.length}
              >
                <SelectTrigger id="ciudad">
                  <SelectValue placeholder="Selecciona una ciudad" />
                </SelectTrigger>
                <SelectContent>
                  {ciudadesFiltradas.map((ciudad) => (
                    <SelectItem key={ciudad.id} value={ciudad.id.toString()}>
                      {ciudad.nombre}
                    </SelectItem>
                  ))}
                </SelectContent>
              </Select>
              <InputError message={errors.ciudad_id} />

            </div>

          </div>
          <div className="md:flex gap-x-4">
            <div className="mb-3 md:w-[50%]">
              <Label htmlFor="celular" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Celular</Label>
              <Input
                type="text"
                id="celular"
                name="celular"
                value={data.celular}
                onChange={handleChange}
                placeholder="Ingresa tu celular"
                className="mb-4" />
              <InputError message={errors.celular} />

            </div>
            <div className="mb-3 md:w-[50%]">
              <Label htmlFor="email" className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</Label>
              <Input
                type="email"
                id="email"
                name="email"
                value={data.email}
                onChange={handleChange}
                placeholder="Ingresa tu email"
                className="mb-4" />
              <InputError message={errors.email} />

            </div>
          </div>
          <div>
            <Checkbox
              id="habeas"
              name="habeas"
              checked={data.habeas}
              onCheckedChange={(checked) => setData('habeas', !!checked)} />

            <Label htmlFor="habeas" className="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Autorizo el tratamiento de mis datos de acuerdo con la finalidad establecida en la política de protección de datos personales</Label>
            <InputError message={errors.habeas} />

          </div>

          <button
            type="submit"
            disabled={processing}
            className="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none"
          >
            Registrar
          </button>

        </form>
        <Dialog open={showDialog} onOpenChange={setShowDialog}>
          <DialogContent>
            <DialogHeader>
              <DialogTitle>¡Registro exitoso!</DialogTitle>
              <DialogDescription>
                Tu registro ha sido exitoso.

              </DialogDescription>
            </DialogHeader>
          </DialogContent>
        </Dialog>

      </section>
    </>
  )
}

export default RegistroForm