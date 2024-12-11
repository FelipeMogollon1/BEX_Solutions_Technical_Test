<template>
    <div class="flex h-screen">

        <div class="flex-grow h-full p-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Mapa de Visitas</h1>
            <div class="h-full rounded-lg shadow-lg overflow-hidden">
                <l-map :zoom="zoom" :center="mapCenter" class="h-full w-full">
                    <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />

                    <l-marker
                        v-for="(visit, index) in visits"
                        :key="index"
                        :lat-lng="[visit.latitude, visit.longitude]"
                    >
                        <l-popup>
                            <p><strong>{{ visit.name }}</strong></p>
                            <p>{{ visit.email }}</p>
                        </l-popup>
                    </l-marker>
                </l-map>
            </div>
        </div>


        <div class="w-1/4 h-full bg-gray-100 p-4 overflow-y-auto">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Lista de Visitas</h2>
            <ul>
                <li
                    v-for="(visit, index) in visits"
                    :key="index"
                    @click="centerMap(visit.latitude, visit.longitude)"
                    class="mb-2 p-2 bg-white rounded shadow cursor-pointer hover:bg-gray-200"
                >
                    <p class="font-bold text-gray-800">{{ visit.name }}</p>
                    <p class="text-sm text-gray-600">{{ visit.email }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { LMap, LTileLayer, LMarker, LPopup } from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";

export default {
    components: {
        LMap,
        LTileLayer,
        LMarker,
        LPopup,
    },
    props: {
        visits: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            zoom: 6,
            mapCenter: [4.570868, -74.297333],
        };
    },
    methods: {
        centerMap(lat, lng) {
            this.mapCenter = [lat, lng];
            this.zoom = 12;
        },
    },
};
</script>

<style scoped>
.l-map {
    border-radius: 0.5rem;
    border: 1px solid #e5e7eb;
}
</style>
