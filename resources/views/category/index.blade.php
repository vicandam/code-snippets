@extends('layouts.app')

@section('content')
    <template>
        <v-container fluid class="mt-12 pt-12 grey lighten-5">
            <v-row no-gutters>
                <v-col
                    cols="12"
                >
                    <v-data-table
                        :headers="headers"
                        :items="categories"
                        :search="search"
                        class="elevation-1"
                    >
                        <template v-slot:top>
                            <v-toolbar flat color="white">
                                <v-toolbar-title>Categories</v-toolbar-title>
                                <v-divider
                                    class="mx-4"
                                    inset
                                    vertical
                                ></v-divider>
                                <v-btn tile
                                       outlined
                                       @click="roomDialog = true"
                                >
                                    <v-icon left>mdi-pencil</v-icon>
                                    New Category
                                </v-btn>
                                <v-spacer></v-spacer>
                                <v-text-field
                                    v-model="search"
                                    append-icon="search"
                                    label="Search"
                                    single-line
                                    hide-details
                                ></v-text-field>

                            </v-toolbar>
                        </template>

                        <template v-slot:item.action="{ item }">
                            <v-container fluid>
                                <v-layout row align-center>
                                    <v-tooltip bottom>
                                        <template v-slot:activator="{ on }">
                                            <v-btn color="button" class="black--text" v-on="on" fab
                                                       @click="edit(item)"
                                                   x-small dark>
                                                <v-icon>edit</v-icon>
                                            </v-btn>
                                        </template>
                                        <span>Update</span>
                                    </v-tooltip>

                                    <v-tooltip bottom>
                                        <template v-slot:activator="{ on }">
                                            <v-btn class="mx-2" fab dark x-small v-on="on" color="red darken-3"
                                                @click="remove(item)"
                                            >
                                                <v-icon dark>delete_outline</v-icon>
                                            </v-btn>
                                        </template>
                                        <span>Delete</span>
                                    </v-tooltip>

                                </v-layout>
                            </v-container>
                        </template>

                    </v-data-table>
                </v-col>
            </v-row>
        </v-container>

        <v-snackbar
            v-model="snackbar"
            :top="y === 'top'"
            color="success"
        >
            @{{ text }}
            <v-btn
                color="white"
                text
                @click="snackbar=false"
            >
                Close
            </v-btn>
        </v-snackbar>

    </template>

    @include('modal.delete')
    @include('modal.room')

@endsection

@push('scripts')

    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: () => ({
                drawer: true,
                info: '',
                delete_dialog: false,
                roomDialog: false,
                update: false,
                snackbar: false,

                formTitle: '',
                info: 'category',
                text: '',
                errors: [],
                imageData: '',
                y: 'top',

                headers: [
                    {text: 'Category', value: 'name'},
                    {text: 'Image', value: 'email'},
                    {text: 'Action', value: 'action', sortable: false}
                ],
                categories: [],
                search: '',

                category: {
                    iname: '',
                    image: ''
                },
                categoryId: ''
            }),


            mounted() {
                this.getCategories();
            },

            methods: {
                getCategories: function () {
                    _this = this;

                    axios.get('/api/category').then(function (response) {
                        _this.categories = response.data.data.categories;
                    })
                },

                delete: function (item) {

                },

                remove: function(item) {
                    this.delete_dialog = true;
                    this.categoryId = item.id;
                },

                deleteProceed: function () {
                    let _this = this;

                    axios.delete('/api/category/' + this.categoryId).then(function (response) {
                        _this.getCategories();
                        _this.snackbar = true;
                        _this.delete_dialog = false;
                        _this.text = 'Category deleted successfully';
                    })
                },

                edit: function (item) {
                    this.roomDialog = true;
                    this.category.name = item.category_name;
                    this.update = true;
                    this.categoryId = item.id;
                },
                testing: function() {
                  alert('nice');
                },

                save: function () {
                    let _this = this;
                    let attribute = {
                        name: this.category.name
                    };

                    if (this.update) {
                        axios.patch('/api/category/' + this.categoryId, attribute).then(function (response) {
                            console.log(response.data);
                            _this.getCategories();
                            _this.snackbar = true;
                            _this.roomDialog = false;
                            _this.text = response.data.message;
                        })
                    } else {
                        axios.post('api/category', attribute).then(function (response) {
                            _this.getCategories();
                            _this.roomDialog = false;
                            _this.snackbar = true;
                            _this.text = response.data.message;
                        })
                    }
                },

                close: function () {
                    this.roomDialog = false;
                }

                // clearFields: function () {
                //     this.password =  '';
                //     this.switch1 = false;
                // }
            }
        })
    </script>
@endpush
