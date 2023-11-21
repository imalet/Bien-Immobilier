<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5v5zvUfGsVXlxFyKrXbGlhOQlKhG4H0hFuLWxCqM82B0wP2rHn+F2g" crossorigin="anonymous">
    <title>Liste de bien immobilier</title>
</head>
<body>
    <template>
        <div class="container">
            <h1>List of Articles</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action1</th>
                        <th>Action2</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="article in articles" :key="article.id">
                        <td>{{ article.nom }}</td>
                        <td>{{ article.categorie }}</td>
                        <td>{{ article.photo }}</td>
                        <td>{{ article.description }}</td>
                        <td>{{ article.status }}</td>
                        <td>{{ article.date }}</td>
                        <td><button type="submit">Modifier</button></td>
                        <td><form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </template>
    
    <script>
    export default {
        data() {
            return {
                articles: [],
            };
        },
        mounted() {
            this.getArticles();
        },
        methods: {
            async getArticles() {
                try {
                    const response = await axios.get('/api/articles');
                    this.articles = response.data.data;
                } catch (error) {
                    console.error(error);
                }
            },
        },
    };
    </script>
</body>
</html>