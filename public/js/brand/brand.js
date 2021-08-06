document.addEventListener("DOMContentLoaded", function() {

    const updateInput = (selectBrand) => {
        selectBrand = selectBrand.target;
        const inputEditBrand = document.getElementById('inputEditBrand');
        const selectedValue = [...selectBrand.options]
            .find(item => selectBrand.value === item.value && item.value !== '-1');
        inputEditBrand.value = selectedValue ? selectedValue.innerText : '';
    }

    const fillTableWhitArticles = (selectBrand) => {
        const rowsTable = [...document.querySelectorAll('table tbody tr')];
        showAllRows(rowsTable);
        if (selectBrand.target.value !== '-1') {
            rowsTable.map(row => {
                    if (row.querySelector('.providerId').innerText !== selectBrand.target.value) {
                        row.classList.add('d-none');
                    }
                }
            )
        }
    }

    const showAllRows = (rows) => {
        rows.map(row => {
            row.classList.remove('d-none');
        })
    }

    if (document.getElementById('selectBrand')) {
        document.getElementById('selectBrand').addEventListener('change', updateInput);
    }

    if (document.getElementById('selectBrandToShowData')) {
        document.getElementById('selectBrandToShowData').addEventListener('change', fillTableWhitArticles);
    }
});
