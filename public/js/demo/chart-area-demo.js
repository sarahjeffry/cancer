var ctx = document.getElementById('demographic').getContext('2d');
var demographic = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['2017', '2018', '2019', '2020'],
        datasets: [{
            label: 'Breast',
            data: [12, 19, 6, 3],
            backgroundColor: [
                '#FF8DCC',
                '#FF8DCC',
                '#FF8DCC',
                '#FF8DCC'
            ],
            borderColor: [
                '#FE6EBD',
                '#FE6EBD',
                '#FE6EBD',
                '#FE6EBD',
            ],
            borderWidth: 1
        },
            {
                label: 'Lung',
                data: [2, 29, 25, 15],
                backgroundColor: [
                    '#6C8DFC',
                    '#6C8DFC',
                    '#6C8DFC',
                    '#6C8DFC'
                ],
                borderColor: [
                    '#577CF8',
                    '#577CF8',
                    '#577CF8',
                    '#577CF8'
                ],
                borderWidth: 1
            },
            {
                label: 'Pancreas',
                data: [12, 19, 6, 3],
                backgroundColor: [
                    '#F8735B',
                    '#F8735B',
                    '#F8735B',
                    '#F8735B'
                ],
                borderColor: [
                    '#ED4C2F',
                    '#ED4C2F',
                    '#ED4C2F',
                    '#ED4C2F'
                ],
                borderWidth: 1
            },
            {
                label: 'Skin',
                data: [2, 29, 25, 15],
                backgroundColor: [
                    '#58BC74',
                    '#58BC74',
                    '#58BC74',
                    '#58BC74'
                ],
                borderColor: [
                    '#32AB54',
                    '#32AB54',
                    '#32AB54',
                    '#32AB54'

                ],
                borderWidth: 1
            }]
    },
    options: {
        tooltips: {
            mode: 'index',
        }
    }
});
