<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


defineProps(props => {
    return {
        message: props.message,
    };
});

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BreezeGuestLayout>

        <Head title="Register" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-md mx-auto p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="submit">
                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                                autocomplete="name" />
                            <BreezeInputError :message="form.errors.name" />

                        </div>
                        <div class="mt-4">
                            <BreezeLabel for="username" value="Username" />
                            <BreezeInput id="username" type="text" class="mt-1 block w-full" v-model="form.username"
                                autocomplete="username" />
                            <BreezeInputError :message="form.errors.username" />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="email" value="Email" />
                            <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" autocomplete="email" />
                            <BreezeInputError :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="password" value="Password" />
                            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                autocomplete="new-password" />
                            <BreezeInputError :message="form.errors.password" />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="password_confirmation" value="Confirm Password" />
                            <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full"
                                v-model="form.password_confirmation" autocomplete="new-password" />
                            <BreezeInputError :message="form.errors.password_confirmation" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Already registered?
                            </Link>

                            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Register
                            </BreezeButton>
                        </div>
                    </form>
            </div>
        </div>


    </BreezeGuestLayout>
</template>
