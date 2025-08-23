if (typeof trustedTypes === 'undefined')
  trustedTypes = { createPolicy: (name, rules) => rules };

const policy = trustedTypes.createPolicy("basic-policy", {
  createHTML: (input) => DOMPurify.sanitize(input),
});

export default policy;