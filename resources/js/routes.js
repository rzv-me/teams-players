import ExampleComponent from "./components/ExampleComponent";
import TeamList from "./components/TeamList";
import TeamDetails from "./components/TeamDetails";

export default {
    mode: 'history',
    routes: [
        {
            path: '/teams',
            name: 'teams',
            component: TeamList,
        },
        {
            path:'/teams/:id',
            component: TeamDetails,
            props: true},
        {
            path: '/hello',
            name: 'hello',
            component: ExampleComponent,
        },
    ],
}