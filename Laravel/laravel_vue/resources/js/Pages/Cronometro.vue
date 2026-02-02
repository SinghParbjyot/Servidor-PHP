<script setup>
import { ref, onUnmounted } from 'vue';

// 1. Estados reactivos (Equivalente a useState)
const minutos = ref(0);
const segundos = ref(0);
const milisegundos = ref(0);
const corriendo = ref(false);

// Referencia para el intervalo (Equivalente a useRef)
let idIntervalo = null;

// 2. Lógica del Cronómetro
const startStop = () => {
  corriendo.value = !corriendo.value;

  if (corriendo.value) {
    idIntervalo = setInterval(() => {
      milisegundos.value++;

      if (milisegundos.value >= 99) {
        milisegundos.value = 0;
        segundos.value++;

        if (segundos.value >= 59) {
          segundos.value = 0;
          minutos.value++;
        }
      }
    }, 10);
  } else {
    clearInterval(idIntervalo);
  }
};

const reset = () => {
  corriendo.value = false;
  clearInterval(idIntervalo);
  minutos.value = 0;
  segundos.value = 0;
  milisegundos.value = 0;
};

// 3. Formateo (Equivalente a la función auxiliar)
const formatear = (num) => num.toString().padStart(2, "0");

// Limpieza al destruir el componente (Equivalente al return del useEffect)
onUnmounted(() => {
  clearInterval(idIntervalo);
});
</script>

<template>
  <div class="bg-base-200 flex min-h-screen items-center justify-center">
    <div class="card bg-base-100 w-96 p-8 shadow-xl">

      <div class="mb-6 flex items-end justify-center gap-4 text-neutral-content">
        <div class="bg-neutral rounded-lg px-4 py-3 text-center">
          <div class="font-mono text-4xl text-white">{{ formatear(minutos) }}</div>
          <div class="text-xs opacity-60">MIN</div>
        </div>

        <div class="pb-4 font-mono text-3xl text-neutral-content">:</div>

        <div class="bg-neutral rounded-lg px-4 py-3 text-center">
          <div class="font-mono text-4xl text-white">{{ formatear(segundos) }}</div>
          <div class="text-xs opacity-60">SEG</div>
        </div>

        <div class="pb-4 font-mono text-3xl text-neutral-content">:</div>

        <div class="bg-neutral rounded-lg px-4 py-3 text-center">
          <div class="font-mono text-2xl text-white">{{ formatear(milisegundos) }}</div>
          <div class="text-xs opacity-60">MS</div>
        </div>
      </div>

      <div class="flex justify-center gap-4">
        <button
            @click="startStop"
            :class="['btn w-24', corriendo ? 'btn-error' : 'btn-primary']"
        >
          {{ corriendo ? "Stop" : "Start" }}
        </button>

        <button @click="reset" class="btn btn-outline w-24">
          Reset
        </button>
      </div>

    </div>
  </div>
</template>