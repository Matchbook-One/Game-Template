const fs = require('fs');
//const eventPayload = require(process.env.GITHUB_EVENT_PATH);

/** @type {{moduleID: string, namespace: string, icon: string, repo: string, confirm: string[] }} */
const order = require('./data.json');

//const user = eventPayload.sender.login;
/**
 * @param {string} string
 * @returns {string}
 */
const titleCase = (string) => string.split('-')
    .map(title => title.replace(title[0], title[0].toUpperCase()))
    .join('');
/**
 * @param {string} string
 * @returns {string}
 */
const noDash = (string) => string.replace('-', '');

const repository = titleCase(order.repo === '' ? order.moduleID : order.repo);
const moduleName = noDash(order.moduleID);
const namespace = order.namespace.endsWith('\\') ? `${order.namespace}${moduleName}\\` : `${order.namespace}\\${moduleName}\\`;
const icon = order.icon.startsWith('fa-') ? order.icon : `fa-${order.icon}`;
const content = `php ./yii gii/game --moduleID="${order.moduleID}" --namespace=${namespace} --icon=${icon}`;

fs.writeFileSync('generate.sh', content);