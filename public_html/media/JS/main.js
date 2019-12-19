"use strict";

const endpoints = {
    get: "API/companies/get.php",
};

function api(url, formData, success, fail) {
    fetch(url, {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(response => {
            if (response.status === "success") {
                success(response.data);
            } else {
                fail(response.errors);
            }
        })
        .catch(e => {
            console.log(e);
            fail(["Could not connect to API"]);
        });
}

const Company = {
    init: function () {
        this.getElement.searchButton().addEventListener('click', Company.onSearchListener);
        this.getElement.exportButton().addEventListener('click', Company.onExportListener);
    },
    getElement: {
        searchForm: function () {
            return document.querySelector('#searchForm');
        },
        searchInput: function () {
            return document.querySelector('.searchInput');
        },
        searchButton: function () {
            return document.querySelector('.search-btn');
        },
        exportButton: function () {
            return document.querySelector('.export-btn');
        },
        tableHead: function () {
            return document.querySelector('thead');
        },
        tableBody: function () {
            return document.querySelector('#table-body');
        },
    },
    onSearchListener: function (e) {
        e.preventDefault();
        Company.getElement.searchForm().removeAttribute('code');
        Company.getElement.searchForm().setAttribute('code', Company.getElement.searchInput().value);
        let formData = new FormData();
        formData.append('code', Company.getElement.searchInput().value)
        api(endpoints.get, formData, Company.load.success, Company.load.fail);
    },
    load: {
        success: function (data) {
            ui.clearTable();
            ui.clearForm();
            Company.getElement.tableHead().append(Company.row.renderThead())
            data.forEach(el => Company.row.insert(el));
        },
        fail: function (error) {
            console.log(error)
        },
    },
    onExportListener: function (e) {
        if (Company.getElement.searchForm().getAttribute('code') === null || Company.getElement.searchInput().value !== '') {
            Company.onSearchListener(e);
        }
        e.preventDefault();
        let formData = new FormData();
        formData.append('code', Company.getElement.searchForm().getAttribute('code'))
        api(endpoints.get, formData, Company.export.success, Company.export.fail);
    },
    export: {
        success: function (data) {
            let csvContent = '';
            let titleArray = ['code', 'jarCode', 'name', 'municipality', 'ecoActCode', 'ecoActName', 'month', 'avgWage', 'numInsured', 'avgWage2', 'numInsured2', 'tax'];
            let dataString = titleArray.join(',');
            csvContent += dataString + '\n';

            data.forEach(function (infoArray, index) {
                let dataString = Object.values(infoArray).join(',');
                csvContent += index < data.length ? dataString + '\n' : dataString;
            });
            let filename = data[0].name;
            let blob = new Blob([csvContent], {type: 'text/csv;charset=utf-8;'});
            if (navigator.msSaveBlob) {
                navigator.msSaveBlob(blob, filename);
            } else {
                let link = document.createElement("a");
                if (link.download !== undefined) {

                    let url = URL.createObjectURL(blob);
                    link.setAttribute("href", url);
                    link.setAttribute("download", filename);
                    link.style.visibility = 'hidden';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            }
        },
        fail: function (error) {
            console.log(error)
        },
    },
    row: {
        renderThead: function () {
            let rowTr = document.createElement("tr");
            rowTr.className = "table-head";
            rowTr.innerHTML = `  <th>Draudėjo kodas</th>
        <th>Įmonės juridinių asmenų registro kodas.</th>
        <th>Įmonės pavadinimas</th>
        <th>Savivaldybė</th>
        <th>Ekonominės veiklos kodas</th>
        <th>Ekonominės veiklos pavadinimas</th>
        <th>Mėnuo</th>
        <th>Vidutinis darbo užmokestis (neatskaičius mokesčių) darbuotojams, dirbantiems pagal darbo sutartis ir
            valstybės tarnautojams.
        </th>
        <th>Apdraustųjų skaičius</th>
        <th>Vidutinis darbo užmokestis (neatskaičius mokesčių) darbuotojams, dirbantiems pagal autorines sutartis,
            sporto ir atlikėjo veiklos sutartis, gaunantiems tantjemas.
        </th>
        <th>Apdraustųjų, dirbančių pagal autorines sutartis, sporto ir atlikėjo veiklos sutartis, gaunančių tantjemas,
            skaičius.
        </th>
        <th>Valstybinio socialinio draudimo įmokų suma</th>`
            return rowTr;
        },
        renderRow: function (company) {
            let rowTr = document.createElement("tr");
            rowTr.className = "table-row";
            rowTr.innerHTML = `
            <td class="code-column">${company.code}</td>
            <td class="jarCode-column">${company.jarCode === null ? "Nenurodytas" : company.jarCode}</td> 
            <td class="name-column">${company.name === null ? 'Nenurodytas' : company.name}</td>
            <td class="municipality-column">${company.municipality === null ? 'Nenurodyta' : company.municipality}</td>
            <td class="ecoActCode-column">${company.ecoActCode == null ? 'Nenurodytas' : company.ecoActCode}</td>
            <td class="ecoActName-column">${company.ecoActName === null ? 'Nenurodytas' : company.ecoActName}</td>
            <td class="month-column">${company.month === null ? 'Nenurodytas' : company.month}</td>
            <td class="avgWage-column">${company.avgWage === null ? 'Nenurodytas' : company.avgWage}</td>
            <td class="numInsured-column">${company.numInsured === null ? 'Nenurodytas' : company.numInsured}</td>
            <td class="avgWage2-column">${company.avgWage2 === null ? 'Nenurodytas' : company.avgWage2}</td>
            <td class="numInsured2-column">${company.numInsured2 === null ? 'Nenurodytas' : company.numInsured2}</td>
            <td class="tax-column">${company.tax === null ? 'Nenurodyta' : company.tax}</td>`;
            return rowTr;
        },
        insert: function (company) {
            Company.getElement.tableBody().appendChild(Company.row.renderRow(company))
        }
    }
};

const ui = {
    clearForm: function () {
        Company.getElement.searchInput().value = '';
    },
    clearTable: function () {
        Company.getElement.tableBody().textContent = '';
        Company.getElement.tableHead().textContent = '';
    }
};


// Launch App
Company.init();
