<template>
    <div class="container-fluid">
        <div class="grid">
            <div v-masonry transition-duration="0.3s" item-selector=".grid-item">
                <div v-masonry-tile class="grid-item" v-for="(searchResult, index) in searchResults">
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
        </div>
    </div>
</template>

<script>
    import bus from '../../../bus'
    import SearchResultItem from './searchResultItem.vue'
    import Joi from 'joi'

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
                let schema = Joi.object().keys({
                    title: Joi.string().required(),
                    image: Joi.string().required(),
                    height: [Joi.string().required(), Joi.number().required()],
                    width: [Joi.string().required(), Joi.number().required()]
                })
                return Joi.validate(searchResult, schema)
            }
        },
        components: {
            SearchResultItem
        }
    }
</script>
