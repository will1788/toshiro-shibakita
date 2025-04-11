# Utiliza uma versão específica do Nginx para estabilidade
FROM nginx:1.26.3-alpine


COPY nginx.conf /etc/nginx/nginx.conf
