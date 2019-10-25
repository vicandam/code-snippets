@extends('layouts.app')

@section('content')
    <template>
        <v-container fluid class="mt-12 pt-12 grey lighten-5">
{{--            <v-row no-gutters>--}}
{{--                <v-col--}}
{{--                    cols="12"--}}
{{--                >--}}
{{--                    <v-card--}}
{{--                        class="pa-2"--}}
{{--                        outlined--}}
{{--                        tile--}}
{{--                    >--}}
{{--                        <v-row no-gutters>--}}
{{--                            <v-col--}}
{{--                                cols="12"--}}
{{--                                sm="6"--}}
{{--                                md="6"--}}
{{--                            >--}}


{{--                                <v-row no-gutters>--}}
{{--                                    <v-col--}}
{{--                                        cols="12"--}}
{{--                                        sm="6"--}}
{{--                                        md="6"--}}
{{--                                    >--}}
{{--                                        <div class="pa-4">--}}
{{--                                            <div class="text-left">--}}
{{--                                                <div class="title"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </v-col>--}}

{{--                                    <v-col--}}
{{--                                        cols="12"--}}
{{--                                        sm="6"--}}
{{--                                        md="6"--}}
{{--                                    >--}}
{{--                                        --}}{{-- blank --}}
{{--                                    </v-col>--}}
{{--                                </v-row>--}}
{{--                            </v-col>--}}
{{--                            <v-col--}}
{{--                                cols="12"--}}
{{--                                sm="6"--}}
{{--                                md="6"--}}
{{--                            >--}}
{{--                                <div--}}
{{--                                    class="pa-2 text-right">--}}
{{--                                    --}}{{--                                    @include('topic.post.modal.create')--}}
{{--                                </div>--}}
{{--                            </v-col>--}}
{{--                        </v-row>--}}
{{--                    </v-card>--}}
{{--                </v-col>--}}
{{--            </v-row>--}}

            <v-row no-gutters>
                <v-col
                    cols="12"
                >
                    <v-data-table
                        :headers="headers"
                        :items="users"
                        :search="search"
                        class="elevation-1"
                    >
                        <template v-slot:top>
                            <v-toolbar flat color="white">
                                <v-toolbar-title>Users</v-toolbar-title>
                                <v-divider
                                    class="mx-4"
                                    inset
                                    vertical
                                ></v-divider>

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
                                            <v-btn color="button" class="black--text" @click="edit(item)" v-on="on" fab x-small dark>
                                                <v-icon>edit</v-icon>
                                            </v-btn>
                                        </template>
                                        <span>Update</span>
                                    </v-tooltip>

                                    <v-tooltip bottom>
                                        <template v-slot:activator="{ on }">
                                            <v-btn
                                                class="mx-2"
                                                fab dark x-small
                                                v-on="on"
                                                color="red darken-3"
                                                @click="delete(item)"
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
    </template>

        @include('modal.delete')
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

                headers: [
                    { text: 'Name', value: 'name' },
                    { text: 'Email', value: 'email' },
                    { text: 'Action', value: 'action', sortable: false }
                ],
                users: [],
                search: ''
            }),


            created() {
                this.getUsers();
            },

            methods: {
                getUsers: function () {
                    _this = this;

                    axios.get('/api/user').then(function (response) {
                        _this.users = response.data.data.users;
                    })
                },

                delete: function(item) {
                    console.log('Deleting..');
                    alert(item);
                    this.delete_dialog = true;
                    this.info = 'user';
                },

                deleteProceed: function() {
                    axios.delete('/api/user/' + this.userId).then(function (response) {
                        this.getUsers();
                    })
                },

                edit: function () {
                    let _this = this;
                    this.edit_dialog = true;
                },
                // clearFields: function () {
                //     this.password =  '';
                //     this.switch1 = false;
                // }
            }
        })
    </script>
@endpush
