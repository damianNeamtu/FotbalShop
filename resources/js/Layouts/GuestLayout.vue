<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <Link href="/"  class="flex items-center justify-between mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19.071 4.929a9.936 9.936 0 0 0-7.07-2.938a9.943 9.943 0 0 0-7.072 2.938c-3.899 3.898-3.899 10.243 0 14.142a9.94 9.94 0 0 0 7.073 2.938a9.936 9.936 0 0 0 7.07-2.937c3.899-3.898 3.899-10.243-.001-14.143M12.181 4h-.359c.061-.001.119-.009.18-.009s.118.008.179.009m6.062 13H16l-1.258 2.516a7.956 7.956 0 0 1-2.741.493a7.96 7.96 0 0 1-2.746-.494L8 17.01H5.765a7.96 7.96 0 0 1-1.623-3.532L6 11L4.784 8.567a7.936 7.936 0 0 1 1.559-2.224a7.994 7.994 0 0 1 3.22-1.969L12 6l2.438-1.625a8.01 8.01 0 0 1 3.22 1.968a7.94 7.94 0 0 1 1.558 2.221L18 11l1.858 2.478A7.952 7.952 0 0 1 18.243 17" />
                    <path fill="currentColor" d="m8.5 11l1.5 4h4l1.5-4L12 8.5z" />
                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Fotbal Shop</span>
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
