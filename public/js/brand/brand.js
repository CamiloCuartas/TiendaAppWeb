document.addEventListener("DOMContentLoaded", function(event) {

    const updateInput = (selectBrand) => {
        selectBrand = selectBrand.target;
        const inputEditBrand = document.getElementById('inputEditBrand');
        const selectedValue = [...selectBrand.options]
            .find(item => selectBrand.value === item.value && item.value !== '-1');
        inputEditBrand.value = selectedValue ? selectedValue.innerText : '';
    }

    document.getElementById('selectBrand').addEventListener('change', updateInput);
});
