export interface IArticleCreateRequest {
  title: string, // 文章标题
}

export interface IArticleUpdateRequest {
  id: number, // 文章ID
  title: string, // 文章标题
}

export interface IArticleResponse {
  id: number, // 文章编号
  title: string, // 文章标题
}

export interface IUserQueryRequest {
  name: string, // 名称
  mobile: string, // 手机号
  status: number, // 状态
}

export interface IUserResponse {
  id: number, // 编号
  name: string, // 员工姓名
  avatar: string, // 头像
}

