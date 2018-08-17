<template>
    <div>
        <div v-for="searchResult in searchResults">
            <search-result-item
                v-if="isValid(searchResult)"
                :title="searchResult.title"
                :image="searchResult.url_m"
                :width="searchResult.width_m"
                :height="searchResult.height_m"
            >
            </search-result-item>
        </div>
    </div>
</template>

<script>
    import bus from '../../../bus'
    import SearchResultItem from './searchResultItem.vue'

    export default {
        mounted () {
            var that = this;
            bus.$on('setSearchResults', searchResults => {
                that.searchResults = searchResults;
            })
        },
        data () {
            return {
                searchResults: []
            }
        },
        methods: {
            isValid: searchResult => {
                return true
            }
        },
        components: {
            SearchResultItem
        }
    }
</script>
