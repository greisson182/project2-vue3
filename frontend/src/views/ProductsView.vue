<template>
  <div class="products">
    <h1>Products</h1>

    <ProductInfo
      :likes="product.likes"
      :comments="product.comments"
      @addProduct="addProduct"
    />
  </div>
</template>
<script setup>
import { reactive } from 'vue';
import ProductInfo from '@/components/ProductInfo.vue';

const product = reactive({
    likes: 20,
    comments: 30
});

function addProduct(product) {
    alert('Produto adicionado '+ product);
}

</script>

<style>

</style>
