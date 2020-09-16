const contactsEndpoint = "/";

interface Contact {
  name: String,
  lastname: String,
  contacts: String[]
}

export const addNewContact = (contact: Contact) => {
  const body = JSON.stringify(contact);
  fetch(contactsEndpoint, {
    method: "POST",
    body,
  });
};
