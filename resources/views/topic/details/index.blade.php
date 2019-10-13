@extends('layouts.app')
@section('content')
    <template>
        <v-container fluid class="mt-12 pt-12 grey lighten-5">
            <v-row no-gutters>
                <v-col
                    cols="12"
                >
                    <v-card
                        class="pa-2"
                        outlined
                        tile
                    >
                        <v-row no-gutters>
                            <v-col
                                cols="12"
                                sm="6"
                                md="6"
                            >

                                <v-row no-gutters>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="6"
                                    >
                                        <div class="pa-4">
                                            <div class="text-left">
                                                <div class="title">Details</div>
                                            </div>
                                        </div>
                                    </v-col>

                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="6"
                                    >
                                    {{-- blank --}}
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col
                                cols="12"
                                sm="6"
                                md="6"
                            >
                                <div
                                    class="pa-2 text-right">
                                    <v-btn tile outlined dark color="#E64A19">
                                        <v-icon left>home</v-icon> Home
                                    </v-btn>
                                    <v-btn class="ma-1" tile outlined dark color="#E64A19" href="{{ url('topic-my-posts') }}">
                                        <v-icon left>collections_bookmark</v-icon> My post
                                    </v-btn>
                                    <v-btn tile outlined dark color="#E64A19">
                                        <v-icon left>mdi-pencil</v-icon> Post answer
                                    </v-btn>
                                </div>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
            </v-row>

            <v-row no-gutters>
                <v-col
                    cols="12"
                >
                    <v-card
                        class="pa-2"
                        outlined
                        tile
                    >

                        <template>
                            <v-card
                                class="mx-auto"
                                color="#EFEBE9"
                                light
                                tile
                                flat
                            >
                                <v-card-title>
                                    <span class="title"><span class="headline font-weight-bold">Solution:</span><span v-text="title"></span></span>
                                </v-card-title>

                                <v-card-text class="mt-5 font-weight-normal">
                                    <pre class="line-numbers" v-html="description" data-start="-5" style="white-space:pre-wrap;"></pre>
                                </v-card-text>

                                <v-card-actions>
                                    <v-list-item class="grow" three-line>
                                        <v-list-item-avatar color="grey darken-3 mt-5">
                                            <v-img
                                                class="elevation-6"
                                                src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                                            ></v-img>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <v-list-item-subtitle> Created @{{ createdAt }} by me</v-list-item-subtitle>
                                        </v-list-item-content>

                                        <v-row
                                            align="center"
                                            justify="end"
                                        >
                                            <v-btn text icon color="#F44336">
                                                <v-icon class="mr-1">mdi-heart</v-icon>
                                            </v-btn>
                                            <span class="subheading mr-2">256</span>
                                            <span class="mr-1">·</span>
                                            <v-icon class="mr-1">remove_red_eye</v-icon>
                                            <span class="subheading mr-2">45</span>
                                            <span class="mr-1">·</span>
                                            <v-btn text icon color="indigo">
                                                <v-icon class="mr-1">mdi-share-variant</v-icon>
                                            </v-btn>
                                            <span class="subheading mr-2">45</span>

                                            <div class="ml-8">
{{--                                                href="{{ $topic->id }}/edit"--}}
                                                <v-btn  fab dark x-small color="primary" @click="edit">
                                                    <v-icon dark>edit</v-icon>
                                                </v-btn>

                                                <v-btn class="mx-1" fab dark x-small color="error">
                                                    <v-icon dark>delete_forever</v-icon>
                                                </v-btn>
                                            </div>
                                        </v-row>
                                    </v-list-item>
                                </v-card-actions>
                            </v-card>
                        </template>

                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </template>
    @include('topic.details.modal.edit')
@endsection

@push('scripts')

    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: () => ({
                drawer: true,
                edit_dialog: false,
                categoryId: @json($topic->category_id),
                categories: @json($categories),
                title: @json($topic->title),
                description: @json($topic->description),
                topicId: @json($topic->id),
                createdAt: @json($topic->created_at),

                page: 1,
                items: [],
                model: 1,

                isLoading:             false,

                categoryResponse: {
                    timer:                 null,
                    categoryCount: 0,
                    currentPage: 0,
                    lastPages: 0,
                    previousPageUrl: 0,
                    nextPageUrl: 0,

                    filter: {
                        keyword: '',
                        paginate: 8,
                        searchBy: 'filter',
                    },
                }
            }),

            mounted () {
                this.searchCategory();
            },

            methods: {
                edit() {
                    this.edit_dialog = true;
                    // this.description = this.description;

                    this.$nextTick(() => {

                    setTimeout(function(){

                        var config = {
                            extraPlugins: 'codesnippet',
                            codeSnippet_theme: 'dark',
                            height: 356
                        };

                        CKEDITOR.replace('editor1', config);

                    }.bind(this),100);

                    });
                },

                save(status) {
                    let _this = this;
                    this.description = CKEDITOR.instances['editor1'].getData();
                    let attributes = {
                        'category_id': this.categoryId,
                        'title': this.title,
                        'description': this.description,
                        'status': status
                    };
                    console.log(this.description);
                    axios.patch('/api/topic/' + this.topicId, attributes).then(function (response) {

                        location.reload(true);
                        _this.description = response.data.data.topic.description;
                        _this.edit_dialog = false;
                    })
                },

                searchCategory: function () {
                    var self = this;
                    self.categories.data = [];

                    var url = "/api/category";
                    let attributes = this.categoryResponse.filter;

                    var searchParameters = new URLSearchParams();

                    Object.keys(attributes).forEach(function (parameterName) {
                        searchParameters.append(parameterName, attributes[parameterName]);
                    });

                    url = url + '/?' + searchParameters.toString();

                    if (this.categoryResponse.timer) {
                        this.isLoading = true;
                        clearTimeout(this.categoryResponse.timer);
                        this.categoryResponse.timer = null;
                    }

                    this.categoryResponse.timer = setTimeout(() => {

                        axios.get(url)
                            .then(function (response) {

                                self.categories = response.data.data.categories;
                                self.categoryResponse.categoryCount = response.data.data.category_count;
                                self.categoryResponse.currentPage = response.data.data.categories.current_page;
                                self.categoryResponse.lastPages = response.data.data.categories.last_page;
                                self.categoryResponse.previousPageUrl = response.data.data.categories.prev_page_url;
                                self.categoryResponse.nextPageUrl = response.data.data.categories.next_page_url;

                                self.isLoading = false;
                            });
                    }, 800);
                },

                nextCategory (pageNumber) {
                    var _this             = this;

                    _this.categoryResponse.filter.page     = pageNumber;

                    let url               = '/api/category';
                    let attributes        = _this.categoryResponse.filter;

                    var searchParameters  = new URLSearchParams();

                    Object.keys(attributes).forEach(function (parameterName) {
                        searchParameters.append(parameterName, attributes[parameterName]);
                    });

                    url  = url + '/?' + searchParameters.toString();

                    axios.get(url).then(function (response) {

                        console.log(response);

                        _this.categoryResponse.categoryCount    = response.data.data.category_count;
                        _this.categoryResponse.currentPage      = response.data.data.categories.current_page;
                        _this.categoryResponse.lastPages        = response.data.data.categories.last_page;
                        _this.categoryResponse.previousPageUrl  = response.data.data.categories.prev_page_url;
                        _this.categoryResponse.nextPageUrl      = response.data.data.categories.next_page_url;

                        if (response.data.data.categories.data) {

                            _this.categories.data  = [];

                            response.data.data.categories.data.filter(function (category) {

                                _this.categories.data.push(category);
                            });
                        }
                    });
                },
            }
        })
    </script>
@endpush
