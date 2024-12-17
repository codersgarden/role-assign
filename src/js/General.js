// resources/js/permissions.js

// Function to check if the user has a specific permission
const checkPermission = (userPermissions, route) => {
    return userPermissions.includes(route); // Check if permission exists in the list
};

// Function to toggle visibility based on permission
const togglePermissionButton = (route, buttonId) => {
    if (!checkPermission(userPermissions, route)) {
        document.getElementById(buttonId).style.display = 'none';
    }
};

// Add any other general permission checks here in future if needed