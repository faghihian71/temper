<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Report Chart</div>

                    <div class="card-body">
                        <highcharts :options="chartOptions"></highcharts>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                endpoint: '/api/v1/report/onboarding',
                chartOptions: {
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: 'Temper Assignment'
                    },
                    series: []
                },
                title: ''
            }
        },
        mounted() {
            axios.get(this.endpoint).then((response) => {
                this.chartOptions.series = response.data;
            });
        },

    }
</script>
