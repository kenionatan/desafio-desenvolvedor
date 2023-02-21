<script setup>
  import useCurrency from '../composables/currency';
  import { reactive } from 'vue';

  const {conversionResult, getCurrencyConversion} = useCurrency();

  const form = reactive({
    currency: "",
    currency_value: "",
    payment_method: "",
  });
</script>

<template>
  <main>
    <form class="max-w-md mx-auto p-4" @submit.prevent="getCurrencyConversion(form)">
      <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Value</label>
      <div class="flex">
        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
          $ BRL
        </span>
        <input 
          type="text" 
          id="currency-value" 
          class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          placeholder="0.00"
          v-model="form.currency_value"
        >
      </div>

      <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Currency</label>
      <div class="flex">
        <input 
          type="text" 
          id="currency" 
          class="rounded-none rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          placeholder="Target Currency"
          v-model="form.currency"
        >
      </div>

      <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Select your payment method</label>
      <select v-model="form.payment_method" id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="credit_card">Credit Card</option>
        <option value="bank_slip">Bank Slip</option>
      </select>

      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Convert</button>
    </form>
    <div>
      Result: <span v.if="conversionResult">{{ conversionResult }}</span>
    </div>
  </main>
</template>
