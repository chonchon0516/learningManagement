<body>
  <h2>学習のまとめを登録</h2>

  <form method="post" action="./store.php">

    <div>
      <label for="name">テーマ
        <input type="text" name="theme" placeholder="テーマ">
      </label>
    </div>

    <div>
      <label for="contents">学習のまとめ
        <input type="textarea" name="contents" placeholder="学習のまとめ">
      </label>
    </div>

    <button type="submit">登録</button>

  </form>
</body>