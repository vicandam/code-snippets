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
                                md="8"
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
                                        <div class="pt-2 pb-2">
                                            <div class=" text-right">
                                                <v-btn class="ma-1" tile outlined dark color="#E64A19">
                                                    <v-icon left>whatshot</v-icon> Latest
                                                </v-btn>
                                                <v-btn tile outlined dark color="#E64A19">
                                                    <v-icon left>stars</v-icon> Top
                                                </v-btn>
                                                <v-btn class="ma-1" tile outlined dark color="#E64A19">
                                                    <v-icon left>collections_bookmark</v-icon> Yours
                                                </v-btn>
                                            </div>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col
                                cols="12"
                                sm="6"
                                md="4"
                            >
                                <div
                                    class="pa-2 text-right">
                                    <v-btn class="ma-1" tile outlined dark color="#E64A19">
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
                    sm="6"
                    md="8"
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
                                            <v-list-item-subtitle>Created 2 months ago by vic</v-list-item-subtitle>
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

                <v-col
                    cols="6"
                    md="4"
                >
                    @include('topic.categories.index')
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



                page: 1,
                items: [],
                lists: [
                    {
                        text: 'Php',
                    },
                    {
                        text: 'Laravel',
                    },
                    {
                        text: 'Javascript',
                    },
                ],
                model: 1,
            }),

            mounted () {

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
                }
            }
        })
    </script>
@endpush
