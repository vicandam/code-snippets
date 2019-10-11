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
                                                <div class="title">Edit post</div>
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
                                                    <v-icon left>whatshot</v-icon>
                                                    Latest
                                                </v-btn>
                                                <v-btn tile outlined dark color="#E64A19">
                                                    <v-icon left>stars</v-icon>
                                                    Top
                                                </v-btn>
                                                <v-btn class="ma-1" tile outlined dark color="#E64A19">
                                                    <v-icon left>collections_bookmark</v-icon>
                                                    Yours
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
                                        <v-icon left>mdi-pencil</v-icon>
                                        Post answer
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
                                <v-card-text>
                                    <div>
                                        <v-autocomplete
                                            label="Categories"
                                            autocomplete="off"
                                            {{--:items="categories"--}}
                                        ></v-autocomplete>

                                        <v-text-field
                                            label="Title"
                                            required
                                        ></v-text-field>

                                        <div class="ml-5 text-center">
                                            text editor here
{{--                                            <textarea id="editor" name="description" data-sample-preservewhitespace>--}}
{{--                                                {{ $topic->description }}--}}
{{--                                            </textarea>--}}

{{--                                            <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>--}}
                                        </div>
                                    </div>
                                </v-card-text>

                                <v-card-actions>
                                    <v-list-item class="grow" three-line>
                                        <v-row
                                            align="center"
                                            justify="start"
                                        >
                                            <v-btn class="ma-2" tile outlined color="primary">
                                                <v-icon left>save</v-icon>
                                                Public
                                            </v-btn>

                                            <v-btn class="ma-2" tile outlined color="#E64A19">
                                                <v-icon left>save</v-icon>
                                                Private
                                            </v-btn>
                                        </v-row>

                                        <v-row
                                            align="center"
                                            justify="end"
                                        >
                                            <v-btn class="ma-2" tile outlined color="#F44336">
                                                <v-icon left>cancel</v-icon>
                                                Cancel
                                            </v-btn>
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
                    <v-card
                        class="pa-2"
                        outlined
                        tile
                    >
                        <template>
                            <v-card
                                class="mx-auto"
                                max-width="400"
                            >

                                <v-list>
                                    <v-subheader class="headline">Categories</v-subheader>

                                    <v-list-item class="mb-4">
                                        <v-list-item-content>
                                            <v-text-field
                                                flat
                                                hide-details
                                                label="Search"
                                                append-icon="search"
                                            ></v-text-field>
                                        </v-list-item-content>
                                    </v-list-item>

                                    <v-list-item-group v-model="model" mandatory color="indigo">
                                        <v-list-item
                                            v-for="(list, i) in lists"
                                            :key="i"
                                        >
                                            <v-list-item-avatar color="grey darken-3">
                                                <v-img
                                                    class="elevation-6"
                                                    src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                                                ></v-img>
                                            </v-list-item-avatar>

                                            <v-list-item-content>
                                                <v-list-item-title v-text="list.text"></v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-list-item-group>
                                </v-list>
                            </v-card>
                        </template>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </template>
    <textarea id="editor1" name="editor1" data-sample-preservewhitespace>

			</textarea>
    {{--    <div class="container">--}}
{{--        <textarea id="editor" name="description" data-sample-preservewhitespace></textarea>--}}
{{--    </div>--}}
@endsection

@push('scripts')

{{--<script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        var config = {--}}
{{--            extraPlugins: 'codesnippet',--}}
{{--            codeSnippet_theme: 'monokai_sublime',--}}
{{--            height: 356,--}}
{{--            uiColor: '#CCEAEE'--}}
{{--        };--}}

{{--        CKEDITOR.replace('editor', config);--}}
{{--    </script>--}}
<script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js" defer></script>
<script>
    var config = {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime',
        height: 356
    };

    CKEDITOR.replace('editor1', config);
</script>
{{--<script>--}}
{{--    ClassicEditor--}}
{{--        .create( document.querySelector( '#editor' ) )--}}
{{--        .then( editor => {--}}
{{--            var config = {--}}
{{--                extraPlugins: 'codesnippet',--}}
{{--                codeSnippet_theme: 'monokai_sublime',--}}
{{--                height: 356,--}}
{{--                uiColor: '#CCEAEE'--}}
{{--            };--}}

{{--            CKEDITOR.replace('editor', config);--}}
{{--        } )--}}
{{--        .catch( error => {--}}
{{--            console.error( error );--}}
{{--        } );--}}
{{--</script>--}}

    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: () => ({
                drawer: true,
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
                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {

                }
            }),

            mounted() {

            },
        })
    </script>
@endpush
