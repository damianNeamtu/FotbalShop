<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue'
//products list
defineProps({
    products: Array
})


</script>
<template>
    <UserLayouts>
        <!-- here section  -->
        <Hero></Hero>
        <!-- end -->
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Produse recent adăugate</h2>

                <!-- product list component -->
                <Products :products="products"></Products>
                <!-- end -->
                <div class="flex justify-center mt-5">
                    <Link :href="route('products.index')"
                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Vezi toate produsele</Link>
                </div>


            </div>
        </div>

    </UserLayouts>
</template>


<script>
export default {
  name: 'YourComponentName',
  mounted() {
    this.loadTawkToScript();
  },
  methods: {
    loadTawkToScript() {
      var s1 = document.createElement('script');
      var s0 = document.getElementsByTagName('script')[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/666b070c981b6c56477ccaaa/1i09172ea';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    }
  }
}
</script>
