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
                                            <div class="title">Top answers</div>
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
                                    <v-avatar size="50px" class="mr-2">
                                        <img
                                            src="https://cdn.vuetifyjs.com/images/john.jpg"
                                            alt="John"
                                        >
                                    </v-avatar>
                                    <span class="headline">Php</span>
                                </v-card-title>

                                <v-card-text class="title">
                                    "Turns out semicolon-less style is easier and safer in TS because most gotcha edge cases are type invalid as well."
                                </v-card-text>

                                <v-card-actions>
                                    <v-list-item class="grow">
                                        <v-list-item-avatar color="grey darken-3">
                                            <v-img
                                                class="elevation-6"
                                                src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                                            ></v-img>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <v-list-item-title>Created 2 months ago by vic</v-list-item-title>
                                        </v-list-item-content>

                                        <v-row
                                            align="center"
                                            justify="end"
                                        >
                                            <v-icon class="mr-1">mdi-heart</v-icon>
                                            <span class="subheading mr-2">256</span>
                                            <span class="mr-1">·</span>
                                            <v-icon class="mr-1">remove_red_eye</v-icon>
                                            <span class="subheading">45</span>
                                            <span class="mr-1">·</span>
                                            <v-icon class="mr-1">mdi-share-variant</v-icon>
                                            <span class="subheading">45</span>
                                        </v-row>
                                    </v-list-item>
                                </v-card-actions>
                            </v-card>
                        </template>

                        <template>
                            <div class="text-center ma-4">
                                <v-pagination
                                    v-model="page"
                                    :length="4"
                                    circle
                                ></v-pagination>
                            </div>
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
@endsection

@push('scripts')
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
            }),
        })
    </script>
@endpush
