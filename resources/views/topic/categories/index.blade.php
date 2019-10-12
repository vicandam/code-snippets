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

                <v-list-item-group mandatory color="indigo">
                    <v-list-item
                        v-for="(category, i) in categories"
                        :key="i"
                    >
                        <v-list-item-avatar color="grey darken-3">
                            <v-img
                                class="elevation-6"
                                :src="'/storage/avatars/' + category.image"
                            ></v-img>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title v-text="category.name"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-card>
    </template>
</v-card>
