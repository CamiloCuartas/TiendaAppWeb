document.addEventListener("DOMContentLoaded", function(event) {

    const updateInput = (selectBrand) => {
        selectBrand = selectBrand.target;
        const inputEditBrand = document.getElementById('inputEditBrand');
        const selectedValue = [...selectBrand.options]
            .find(item => selectBrand.value === item.value && item.value !== '-1');
        inputEditBrand.value = selectedValue ? selectedValue.innerText : '';
    }

    const fillTableWhitArticles = (selectBrand) => {
        console.log(selectBrand);
    }

    if (document.getElementById('selectBrand')) {
        document.getElementById('selectBrand').addEventListener('change', updateInput);
    }

    if (document.getElementById('selectBrandToShowData')) {
        document.getElementById('selectBrandToShowData').addEventListener('change', fillTableWhitArticles);
    }
});
