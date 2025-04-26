import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { useForm } from "@inertiajs/react";
import { useEffect, useState } from "react";
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogDescription
} from '@/components/ui/dialog';
import { Label } from "@/components/ui/label";
interface SorteoFormProps {
    ganador: any;
}
function SorteoForm({ ganador }: SorteoFormProps) {
    const { errors, post } = useForm();
    const [showGanador, setShowGanador] = useState(false);


    useEffect(() => {
        if (ganador) {
            setShowGanador(true);
        }
    }, [ganador]);

    const handleSorteo = (e: React.FormEvent) => {
        e.preventDefault();

        post(route('sorteo'), {
            preserveScroll: true,
            onSuccess: () => {
                
                setShowGanador(true);
            }
        });
    }

    return (
        <>
            <section >
                <form onSubmit={handleSorteo}>
                    <Label className="block my-3">Nota: esto es para hacer pruebas (se eliminara los usuarios)</Label>
                    <Button type="submit">
                        Reiniciar Sorteo
                    </Button>
                    <InputError
                        message={errors.error}
                        className="mt-2"
                    />
                </form>


                {ganador && (
                    <Dialog open={showGanador} onOpenChange={setShowGanador}>
                        <DialogContent className="sm:max-w-md">
                            <DialogHeader>
                                <DialogTitle className="text-2xl text-center">🎉 ¡Ganador del Sorteo! 🎉</DialogTitle>
                                <DialogDescription className="text-center">
                                    <div className="mt-4 p-4  rounded-lg">
                                        <p className="text-xl font-bold text-blue-800">
                                            Felicitaciones {ganador.user?.nombre} {ganador.user?.apellido}
                                        </p>
                                        <p className="mt-2 text-gray-400">
                                            Has sido seleccionado como ganador
                                        </p>
                                        <p className="mt-2 text-sm text-gray-300">
                                            Fecha del sorteo: {new Date(ganador.fechaSorteo).toLocaleDateString()}
                                        </p>
                                    </div>
                                </DialogDescription>
                            </DialogHeader>
                        </DialogContent>
                    </Dialog>
                )}
            </section>
        </>
    )
}

export default SorteoForm