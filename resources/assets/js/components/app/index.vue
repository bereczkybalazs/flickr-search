<template>
    <div>
        <search></search>
    </div>
</template>

<script>
    import bus from '../../bus'
    import search from './components/search.vue'
    import axios from 'axios'
    import config from '../../config'

    export default {
        mounted () {
            var that = this;
            bus.$on('searchByKeyword', keyword => {
                that.searchByKeyword(keyword)
            })
        },
        components: {
            search
        },
        data () {
            return {
                searchIsBusy: false
            }
        },
        methods: {
            searchByKeyword: keyword => {
                if (!this.searchIsBusy) {
                    this.searchIsBusy = true
                    axios.get(config.searchApiUrl, {params: {q: keyword}}).then(response => {
                        this.searchIsBusy = false
                    })
                }
            }
        }
    }
</script>
