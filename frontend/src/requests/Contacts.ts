const baseUri = "http://localhost:9000";

interface Contact {
  name: String,
  lastname: String,
  contacts: String[]
}

export const addNewContact = (contact: Contact) => {
  const body = JSON.stringify(contact);
  fetch(`${baseUri}/persons`, {
    method: "POST",
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    body,
  });
};
