<script setup>
    import { ref, defineEmits } from 'vue';

    const emit = defineEmits(['close']);

    const form = ref({
        name: '',
        email: '',
        phone: '',
        message: '',
    });

    const alertSend = ref(false);

    const closeModal = () => {
        emit('close');
    };

    const submitForm = async () => {
        try {
            await axios.post('/api/cars/buy-car', form.value);

            alertSend.value = true

            form.value = {
                name: '',
                email: '',
                phone: '',
                message: '',
            }

            closeModal();
        } catch (error) {
            alert('Error al enviar el formulario');
        }
    };
</script>

<template>
    <div v-if="open" class="starting:open:opacity-0"> 
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500/75 transition-opacity">
            <div class="bg-gray-50 rounded-lg shadow-lg w-lg p-2">

                <div class="flexEnd">
                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-4" @click="$emit('close')" >
                        <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#0F0F0F"/>
                    </svg>
                </div>

                <div class="p-2">                    

                    <h2 class="text-sm font-semibold text-gray-700 mb-4">Reserva una cita y te asesoramos sin compromiso.</h2>

                    <form @submit.prevent="submitForm">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2" >
                            
                            <div>
                                <label for="name" class="block text-xs text-gray-900">Nombre *</label>
                                <div class="mt-1">
                                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                                    <input type="text" v-model="form.name" name="name" id="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required/>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-xs text-gray-900">Correo</label>
                                <div class="mt-1">
                                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                                    <input type="email" v-model="form.email" name="email" id="email" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"/>
                                    </div>
                                </div>
                            </div>                            
                            
                            <div>
                                <label for="phone" class="block text-xs text-gray-900">Telefono *</label>
                                <div class="mt-1">
                                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                                        <input type="tel" v-model="form.phone" name="phone" id="phone" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required/>
                                    </div>
                                </div>
                            </div>

                            
                            <div>
                                <label for="message" class="block text-xs text-gray-900">Mensaje *</label>
                                <div class="mt-1">
                                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                                    <textarea v-model="form.message" name="message" id="message" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required/>
                                    </div>
                                </div>
                            </div>

                        </div>

                    
                        <div class="flexBetween mt-4">
                            <div>
                                <a href="tel:696101373">
                                    <p class="text-sm font-semilight text-gray-700 ">Si tienes cualquier duda <span class="text-primary-600">llámanos</span></p>
                                    <p class="text-sm font-bold text-gray-900 flex"> 696 10 13 73 </p>
                                </a>
                            </div>

                            <div>                            
                                <button type="submit" class="bg-primary-600 text-white px-3 py-2 rounded-lg text-sm">Agendar Cita</button>
                            </div>
                        </div>

                    </form>

                </div>

                

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'ServiceModal',

        props: {
            open: Boolean,
            required: true
        },        
    }
</script>

<style lang="scss" scoped>

</style>