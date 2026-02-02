import { useState, useEffect, useRef } from "react";

export default function Cronometro() {
    // 1. Estados para el tiempo
    const [minutos, set_minutos] = useState(0);
    const [segundo, set_segundo] = useState(0);
    const [milisegundo, setmilisegundo] = useState(0);

    // Estado para saber si el cronómetro está activo
    const [corriendo, setCorriendo] = useState(false);

    // Usamos useRef para guardar el ID del intervalo y poder pararlo
    const idIntervalo = useRef(null);

    // 2. Lógica del Cronómetro
    useEffect(() => {
        if (corriendo) {
            idIntervalo.current = setInterval(() => {
                setmilisegundo((ms) => {
                    if (ms >= 99) {
                        // Si llegamos a 100ms, sumamos un segundo y reseteamos ms
                        set_segundo((s) => {
                            if (s >= 59) {
                                set_minutos((m) => m + 1);
                                return 0;
                            }
                            return s + 1;
                        });
                        return 0;
                    }
                    return ms + 1;
                });
            }, 10); // Se ejecuta cada 10 milisegundos
        } else {
            clearInterval(idIntervalo.current);
        }

        // Limpieza al desmontar el componente
        return () => clearInterval(idIntervalo.current);
    }, [corriendo]);

    // 3. Funciones de control
    const start_Stop = () => {
        setCorriendo(!corriendo);
    };

    const reset = () => {
        setCorriendo(false);
        set_minutos(0);
        set_segundo(0);
        setmilisegundo(0);
    };

    // Función auxiliar para que los números siempre tengan 2 dígitos (ej: 05 en vez de 5)
    const formatear = (num) => num.toString().padStart(2, "0");

    return (
        <div className="bg-base-200 flex min-h-screen items-center justify-center">
            <div className="card bg-base-100 w-96 p-8 shadow-xl">
                {/* Display */}
                <div className="mb-6 flex items-end justify-center gap-4">
                    <div className="bg-base-200 rounded-lg px-4 py-3 text-center">
                        <div className="font-mono text-4xl">
                            {formatear(minutos)}
                        </div>
                        <div className="text-xs opacity-60">MIN</div>
                    </div>

                    <div className="pb-4 font-mono text-3xl">:</div>

                    <div className="bg-base-200 rounded-lg px-4 py-3 text-center">
                        <div className="font-mono text-4xl">
                            {formatear(segundo)}
                        </div>
                        <div className="text-xs opacity-60">SEG</div>
                    </div>

                    <div className="pb-4 font-mono text-3xl">:</div>

                    <div className="bg-base-200 rounded-lg px-4 py-3 text-center">
                        <div className="font-mono text-2xl">
                            {formatear(milisegundo)}
                        </div>
                        <div className="text-xs opacity-60">MS</div>
                    </div>
                </div>

                {/* Botones */}
                <div className="flex justify-center gap-4">
                    <button
                        onClick={start_Stop}
                        className={`btn ${corriendo ? 'btn-error' : 'btn-primary'} w-24`}
                    >
                        {corriendo ? "Stop" : "Start"}
                    </button>
                    <button onClick={reset} className="btn btn-outline w-24">
                        Reset
                    </button>
                </div>
            </div>
        </div>
    );
}
