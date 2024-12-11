<template>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="w-1/4 h-full bg-white shadow-lg p-6 overflow-y-auto">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Lista de Visitas</h2>
            <ul class="space-y-4">
                <li
                    v-for="(visit, index) in visits"
                    :key="index"
                    @click="centerMap(visit.latitude, visit.longitude)"
                    class="p-4 bg-gray-100 rounded-lg shadow-md cursor-pointer hover:bg-blue-100 transition"
                >
                    <p class="font-bold text-gray-800">{{ visit.name }}</p>
                    <p class="text-sm text-gray-600">{{ visit.email }}</p>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow h-full p-6">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Mapa de Visitas</h1>
            <div class="h-full rounded-lg shadow-lg overflow-hidden bg-white border border-gray-200">
                <l-map :zoom="zoom" :center="mapCenter" class="h-full w-full">
                    <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />

                    <l-marker
                        v-for="(visit, index) in visits"
                        :key="index"
                        :lat-lng="[visit.latitude, visit.longitude]"
                    >
                        <l-popup>
                            <p class="font-bold text-blue-800">{{ visit.name }}</p>
                            <p class="text-sm text-gray-700">{{ visit.email }}</p>
                        </l-popup>
                    </l-marker>
                </l-map>
            </div>
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
            zoom: 5,
            mapCenter: [4.570868, -74.297333],
        };
    },
    methods: {
        centerMap(lat, lng) {
            this.mapCenter = [lat, lng];
            this.zoom = 12.5;
        },
    },
};
</script>

<style scoped>
.l-map {
    border-radius: 0.75rem;
    border: 1px solid #d1d5db;
}
</style>
