Backend aplikacji do zarządzania kartami, stworzony w Laravelu. Udostępnia REST API dla klienta frontendowego.

**Link do repozytorium frontendu:** [cards-frontend](https://github.com/tomk2201/cards-frontend)

---

## 🚀 Uruchomienie

1.  **Sklonuj repozytorium**
    ```bash
    git clone https://github.com/tomk2201/cards-api.git
    cd cards-api
    ```

2.  **Zainstaluj zależności Composera**
    ```bash
    composer install
    ```

3.  **Skonfiguruj plik środowiskowy `.env`**
    *   Skopiuj `.env.example` do `.env`: `copy .env.example .env` (w Windows) lub `cp .env.example .env` (w Linux/Mac).
    *   W pliku `.env` skonfiguruj połączenie z bazą danych (np. SQLite lub MySQL).

4.  **Wygeneruj klucz aplikacji**
    ```bash
    php artisan key:generate
    ```

5.  **Uruchom migracje i seedery (stworzy to tabele i przykładowe dane)**
    ```bash
    php artisan migrate --seed
    ```
    *   Ta komenda stworzy domyślnego użytkownika i 25 przykładowych kart.
    *   **Login:** `test@example.com`
    *   **Hasło:** `password`

6.  **Uruchom serwer deweloperski**
    ```bash
    php artisan serve
    ```
    API będzie dostępne pod adresem `http://127.0.0.1:8000`.
