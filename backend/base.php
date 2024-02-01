<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTMX test</title>
    <link rel="stylesheet" href="http://localhost:5173/src/index.css">
    <script type="module" src="http://localhost:5173/@vite/client" defer ></script>
    <script type="module" src="http://localhost:5173/src/index.ts" defer ></script>
    <script type="module" src="http://localhost:5173/node_modules/htmx.org/dist/htmx.min.js" defer ></script>
    <!-- <script type="module" src="http://localhost:5173/node_modules/htmx.org/dist/ext/ws.js" defer ></script> -->
</head>
<body>
    <?= $content; ?>
</body>
</html>