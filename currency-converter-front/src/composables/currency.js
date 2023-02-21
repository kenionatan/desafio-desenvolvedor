import { ref } from  "vue";
import axios from "axios";
import { useRouter } from 'vue-router'

axios.defaults.baseURL = "http://localhost/api/v1/";

export default function useCurrency() {
    var conversionResult = ref('');
    const router = useRouter();

    const getCurrencyConversion = async (data) => {
        const response = await axios.get("exchange/convertCurrency/" + 
            data.currency + "/" +
            data.currency_value + "/" + 
            data.payment_method
        );
        conversionResult.value = response.data;
    }

return {
    conversionResult,
    getCurrencyConversion
};

}