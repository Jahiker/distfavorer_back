<template>
    <div>

    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            countUsers: 0,
            countCategories: 0,
            countBrands: 0,
            countProducts: 0
        }
    },
    mounted() {
        console.log('Component mounted');

        this.usersCount();
        this.categoriesCount();
        this.brandsCount();
        this.productsCount();
    },
    methods: {
        usersCount: function() {
            axios.get('api/users/count').then((response) => {
                // console.log(response.data);
                this.countUsers = response.data;
            })
        },
        categoriesCount: function() {
            axios.get('api/categories/count').then((response) => {
                // console.log(response.data);
                this.countCategories = response.data;
            })
        },
        brandsCount: function() {
            axios.get('api/brands/count').then((response) => {
                // console.log(response.data);
                this.countBrands = response.data;
            })
        },
        productsCount: function() {
            axios.get('api/products/count').then((response) => {
                // console.log(response.data);
                this.countProducts = response.data;
            })
        }
    },
}
</script>
