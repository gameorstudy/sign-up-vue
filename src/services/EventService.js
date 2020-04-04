import axios from "axios";

const apiClient = axios.create({
    baseURL: `http://localhost:8080/phpcodes`,
    withCredentials: false,
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    }
});

export default {
    sendAccountInfo(username, password) {
        return apiClient.post(
            "/conn.php",
            "username=" + username + "&password=" + password
        );
    },
};