<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Find Doctors</div>
                    <div class="card-body">
                        <div class="row">
                            <DatePicker expanded borderless v-model="date" color="green" @input="formattedDate" mode="date"
                                is-inline />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Doctors</div>
                    <div class="card-body">
                        <div class="row">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Expertise</th>
                                        <th>Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(d, index) in doctors">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>
                                            <img :src="'/images/' + d.doctor.image" width="80">
                                        </td>
                                        <td>{{ d.doctor.name }}</td>
                                        <td>{{ d.doctor.department }}</td>
                                        <td>
                                            <a :href="'/new-appointment/' + d.user_id + '/' + d.date">
                                                <button class="btn btn-success">Book Appointment</button></a>
                                        </td>
                                    </tr>
                                    <td v-if="doctors.length == 0">No Doctors available for {{ formattedDate }}</td>
                                </tbody>
                            </table>

                        </div>
                        <div class="text-center">
                            <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import moment from 'moment';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

export default {
    data() {

        return {
            date: moment(this.date).format('YYYY-MM-DD'),
            doctors: [],
            loading: false
        }
    },
    components: {
        DatePicker,
        PulseLoader
    },
    computed: {
        formattedDate() {
            this.loading = true
            axios.post('/api/finddoctors', { date: this.date }).
                then((response) => {
                    setTimeout(()=>{
                        this.doctors = response.data
                        this.loading= false
                    },1000)
                   
                }).catch((error) => { alert('error') })
            return moment(this.date).format('YYYY-MM-DD')
        }
    },
    methods: {
        // customDate(date) {
        //     this.date = moment(date).format('YYYY-MM-DD');
        //     axios.post('/api/finddoctors',{date:this.date}).
        //     then((response)=>{
        //         this.doctors = response.data
        //     }).catch((error)=>{alert('error')})
        // }
    },
    mounted() {
        this.loading = true
        axios.get('/api/doctors/today').then((response) => {
            this.doctors = response.data
            this.loading = false
        })
    }
}
</script>

<style>
.vc-container .vc-weekday-1,
.vc-container .vc-weekday-7 {
    color: #6366f1;
}
</style>