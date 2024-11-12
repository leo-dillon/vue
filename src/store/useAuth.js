import { ref, reactive } from 'vue';

const isUserLogged = ref(JSON.parse(localStorage.getItem('user')) !== null);
const user = ref(JSON.parse(localStorage.getItem('user')));

function loginUser(userData) {
  localStorage.setItem('user', JSON.stringify(userData));
  user.value = userData;
  isUserLogged.value = true;
}

function logoutUser() {
  localStorage.removeItem('user');
  user.value = null;
  isUserLogged.value = false;
}

function getUserStatus() {
  return {
    isUserLogged: isUserLogged.value,
    user: user.value,
  };
}

export function useAuth() {
  return {
    getUserStatus,
    loginUser,
    logoutUser,
    isUserLogged,
    user,
  };
}
