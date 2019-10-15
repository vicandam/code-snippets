<v-navigation-drawer
    v-model="drawer"
    app
    clipped
    color="grey lighten-4"
>
    <v-list
        dense
        class="grey lighten-4"
    >
        <template>
            <v-divider
                dark
                class="my-4 mt-12"
            ></v-divider>

            <v-list-item
                :href="'{{ url('/') }}'"
            >
                <v-list-item-action>
                    <v-icon>home</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title class="grey--text">
                        Home
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item href="{{ route('developer.index') }}">
                <v-list-item-action>
                    <v-icon>developer_board</v-icon>
                </v-list-item-action>

                <v-list-item-content>
                    <v-list-item-title class="grey--text">
                        Developers
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            @auth
                <v-list-item href="{{ route('user.index') }}">
                    <v-list-item-action>
                        <v-icon>supervised_user_circle</v-icon>
                    </v-list-item-action>

                    <v-list-item-content>
                        <v-list-item-title class="grey--text">
                            Users
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            @endauth
            <v-list-item href="{{ route('blog.index') }}">
                <v-list-item-action>
                    <v-icon>library_books</v-icon>
                </v-list-item-action>

                <v-list-item-content>
                    <v-list-item-title class="grey--text">
                        Blog's
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </template>
    </v-list>
</v-navigation-drawer>
