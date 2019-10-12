<v-dialog
    transition="dialog-bottom-transition"
    fullscreen
    hide-overlay
    v-model="edit_dialog"
>
    <v-card>
        <v-toolbar dark
                   color="header"
        >

            <v-btn icon
                   dark
                   @click="edit_dialog = false"
            >
                <v-icon>mdi-close</v-icon>
            </v-btn>

            <v-toolbar-title>Edit Topic</v-toolbar-title>

            <div class="flex-grow-1"></div>
        </v-toolbar>
        <v-card-text>
            <v-container>


                <v-card
                    class="mx-auto"
                    color="#EFEBE9"
                    light
                    tile
                    flat
                >
                    <v-form method="POST" action="">
                        <v-card-text>
                            <div>
                                <v-autocomplete
                                    label="Categories"
                                    autocomplete="off"
                                    :items="categories"
                                    v-model="categoryId"
                                    item-value="id"
                                    item-text="category_name"
                                ></v-autocomplete>

                                <v-text-field
                                    label="Title"
                                    required
                                    v-model="title"
                                ></v-text-field>

                                <div class="text-center">
{{--                                    <v-textarea--}}
{{--                                        id="editor1"--}}
{{--                                        clearable--}}
{{--                                        clear-icon="cancel"--}}
{{--                                        label="Text"--}}
{{--                                        v-model="new_description"--}}
{{--                                        data-sample-preservewhitespace--}}
{{--                                    ></v-textarea>--}}
                                    <textarea id="editor1" v-model="description" data-sample-preservewhitespace></textarea>
                                </div>
                            </div>
                        </v-card-text>

                        <v-card-actions>
                            <v-list-item class="grow" three-line>
                                <v-row
                                    align="center"
                                    justify="start"
                                >
                                    <v-btn class="ma-2" tile outlined color="primary"  @click="save(1)">
                                        <v-icon left>save</v-icon>
                                        Public
                                    </v-btn>

                                    <v-btn class="ma-2" tile outlined color="#E64A19" @click="save(0)">
                                        <v-icon left>save</v-icon>
                                        Private
                                    </v-btn>
                                </v-row>

                                <v-row
                                    align="center"
                                    justify="end"
                                >
                                    <v-btn class="ma-2" tile outlined color="#F44336" @click="edit_dialog=false">
                                        <v-icon left>cancel</v-icon>
                                        Cancel
                                    </v-btn>
                                </v-row>
                            </v-list-item>
                        </v-card-actions>

                    </v-form>
                </v-card>


            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>
