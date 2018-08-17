<template>
    <div>
        <search></search>
        <search-results></search-results>
    </div>
</template>

<script>
    import bus from '../../bus'
    import search from './components/search.vue'
    import SearchResults from './components/searchResults.vue'
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
            search,
            SearchResults
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
                        bus.$emit('setSearchResults', response.data)
                        this.searchIsBusy = false
                    })
                }
            }
        }
    }
</script>
